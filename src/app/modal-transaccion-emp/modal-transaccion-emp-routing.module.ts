import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ModalTransaccionEmpPage } from './modal-transaccion-emp.page';

const routes: Routes = [
  {
    path: '',
    component: ModalTransaccionEmpPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ModalTransaccionEmpPageRoutingModule {}
