import { Component, OnInit, Input } from '@angular/core';
import { ModalController } from '@ionic/angular';

@Component({
  selector: 'app-modal-transaccion-emp',
  templateUrl: './modal-transaccion-emp.page.html',
  styleUrls: ['./modal-transaccion-emp.page.scss'],
})
export class ModalTransaccionEmpPage implements OnInit {

  tranData = {
    'fecha':        '',
    'monto':        '',
    'nombre':       '',
    'nTarjeta':     '',
    'nTransaccion': ''
  }
  @Input() data: any;

  constructor(private modalCtrl: ModalController) {
  }

  async dismissModal(){
    await this.modalCtrl.dismiss();
  }
  
  ngOnInit(){
  }
}