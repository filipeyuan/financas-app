import { Component } from '@angular/core';
import { TransactionListComponent } from '../../components/transaction-list/transaction-list.component';
import { TransactionFormComponent } from '../../components/transaction-form/transaction-form.component';

@Component({
  selector: 'app-transactions',
  standalone: true,
  templateUrl: './transactions.component.html',
  styleUrls: ['./transactions.component.scss'],
  imports: [TransactionListComponent, TransactionFormComponent]
})
export class TransactionsComponent {}