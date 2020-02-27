import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ModalTransaccionProvPage } from './modal-transaccion-prov.page';

const routes: Routes = [
  {
    path: '',
    component: ModalTransaccionProvPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ModalTransaccionProvPageRoutingModule {}
