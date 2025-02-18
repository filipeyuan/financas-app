import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormBuilder, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { TransactionService } from '../../services/transaction.service';

@Component({
  selector: 'app-transaction-form',
  standalone: true,
  templateUrl: './transaction-form.component.html',
  styleUrls: ['./transaction-form.component.scss'],
  imports: [CommonModule, ReactiveFormsModule]
})
export class TransactionFormComponent {
  transactionForm: FormGroup;

  constructor(private fb: FormBuilder, private transactionService: TransactionService) {
    this.transactionForm = this.fb.group({
      descricao: [''],
      valor: [''],
      tipo: ['receita'],
      categoria_id: [''],
      data: ['']
    });
  }

  submitForm() {
    if (this.transactionForm.valid) {
      this.transactionService.createTransaction(this.transactionForm.value).subscribe({
        next: (response) => {
          console.log('Resposta do backend:', response);
          alert('Transação cadastrada com sucesso!');
          this.transactionForm.reset();
        },
        error: (error) => {
          console.error('Erro ao cadastrar transação:', error);
          alert('Erro ao cadastrar transação. Veja o console para mais detalhes.');
        }
      });
    }
  }
}