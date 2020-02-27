import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ModalTransaccionProvPageRoutingModule } from './modal-transaccion-prov-routing.module';

import { ModalTransaccionProvPage } from './modal-transaccion-prov.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ModalTransaccionProvPageRoutingModule
  ],
  declarations: [ModalTransaccionProvPage]
})
export class ModalTransaccionProvPageModule {}
