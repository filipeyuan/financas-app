import { Routes } from '@angular/router';
import { TransactionListComponent } from './components/transaction-list/transaction-list.component';
import { TransactionFormComponent } from './components/transaction-form/transaction-form.component';

export const routes: Routes = [
  { path: '', redirectTo: '/transacoes', pathMatch: 'full' },
  { path: 'transacoes', component: TransactionListComponent },
  { path: 'cadastrar', component: TransactionFormComponent }
];