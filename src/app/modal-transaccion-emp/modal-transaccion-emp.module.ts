import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ModalTransaccionEmpPageRoutingModule } from './modal-transaccion-emp-routing.module';

import { ModalTransaccionEmpPage } from './modal-transaccion-emp.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ModalTransaccionEmpPageRoutingModule
  ],
  declarations: [ModalTransaccionEmpPage]
})
export class ModalTransaccionEmpPageModule {}
