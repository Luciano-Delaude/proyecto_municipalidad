import { Component, OnInit, Input } from '@angular/core';
import { ModalController } from '@ionic/angular';

@Component({
  selector: 'app-modal-transaccion-prov',
  templateUrl: './modal-transaccion-prov.page.html',
  styleUrls: ['./modal-transaccion-prov.page.scss'],
})
export class ModalTransaccionProvPage implements OnInit {

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