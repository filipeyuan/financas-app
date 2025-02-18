import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms'; // IMPORTANTE
import { TransactionService } from '../../services/transaction.service';

@Component({
  selector: 'app-transaction-list',
  standalone: true,
  templateUrl: './transaction-list.component.html',
  styleUrls: ['./transaction-list.component.scss'],
  imports: [CommonModule, FormsModule]
})
export class TransactionListComponent implements OnInit {
  transactions: any[] = [];
  transacoesFiltradas: any[] = [];
  filtroTipo: string = '';
  editingTransaction: any = null;

  constructor(private transactionService: TransactionService) {}

  ngOnInit(): void {
    this.loadTransactions();
  }

  loadTransactions() {
    this.transactionService.getTransactions().subscribe(data => {
      this.transactions = data;
      this.filtrarTransacoes();
    });
  }

  filtrarTransacoes() {
    if (this.filtroTipo === '') {
      this.transacoesFiltradas = this.transactions;
    } else {
      this.transacoesFiltradas = this.transactions.filter(t => t.tipo === this.filtroTipo);
    }
  }

  editTransaction(transaction: any) {
    this.editingTransaction = { ...transaction };
  }

  cancelEdit() {
    this.editingTransaction = null;
  }

  updateTransaction() {
    if (this.editingTransaction) {
      this.transactionService.updateTransaction(this.editingTransaction.id, this.editingTransaction).subscribe(() => {
        alert('Transação atualizada com sucesso!');
        this.editingTransaction = null;
        this.loadTransactions();
      });
    }
  }

  deleteTransaction(id: number) {
    if (confirm('Tem certeza que deseja excluir esta transação?')) {
      this.transactionService.deleteTransaction(id).subscribe(() => {
        alert('Transação excluída com sucesso!');
        this.loadTransactions();
      });
    }
  }
}