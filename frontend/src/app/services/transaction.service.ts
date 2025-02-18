import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class TransactionService {
  private apiUrl = 'http://localhost:8080/api/transacoes'; // URL do backend

  constructor(private http: HttpClient) {}

  // Listar todas as transações
  getTransactions() {
    return this.http.get<any[]>(this.apiUrl);
  }  

  // Criar uma nova transação
  createTransaction(transaction: any): Observable<any> {
    return this.http.post<any>(this.apiUrl, transaction);
  }

  // Atualizar uma transação existente
  updateTransaction(id: number, transaction: any): Observable<any> {
    return this.http.put<any>(`${this.apiUrl}/${id}`, transaction);
  }

  // Excluir uma transação
  deleteTransaction(id: number): Observable<any> {
    return this.http.delete<any>(`${this.apiUrl}/${id}`);
  }
}