import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { tarea } from '../tarea'
import { proveedor } from '../proveedor'
import { ToastController, AlertController } from '@ionic/angular';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss'],
})

export class Tab1Page {
  tarea: tarea = {funcion: '', nTarjeta: '', pinTarjeta: '', idProveedor: '', nTransaccion: '', monto: ''};
  proveedor: proveedor = {idProveedor:'', idMunicipalidad:'', nombre:'', direccion:'', categoria: 0};
  constructor(
    private http: HttpClient,
    public toastController: ToastController,
    public alertController: AlertController
  ) {}
//65489256 678
//2001013565489789
  generarTransaccion(){
    if( this.tarea.nTarjeta == '' || 
        this.tarea.idProveedor == '' ||
        this.tarea.nTransaccion == '' ||
        this.tarea.monto == '') this.toast_campoVacio();
    else{
      this.tarea.funcion = 'compra';
      var formData = new FormData();
      for (var key in this.tarea){
        formData.append(key, this.tarea[key]);
      }
      this.http.post('http://54.203.96.189/controladores/funciones.controlador.php',formData)
      .subscribe((res: any) => {
        if(res == null) this.toast_datosInvalidos(); // checkear como viene la variable booleana
        else{
          console.log(res);
          if (res.result == 'ok') this.toast_success();
          else if (res.result == 'saldoinsuficiente') this.toast_insufficient();
          else if (res.result == 'ntransaccioninvalido') this.toast_invalid();
          else this.toast_error();
        }
      });
    }
  }

  async alertConfirmar() {
    const alert = await this.alertController.create({
      header: '¿Generar factura?',
      message: '¿Está seguro que quiere generar una factura con los datos ingresados?',
      buttons: [
        {
          text: 'Cancelar',
          role: 'cancel',
        }, {
          text: 'Sí',
          handler: () => {
            this.generarTransaccion();
          }
        }
      ]
    });
    await alert.present();
  }

  async toast_campoVacio() {
    const toast = await this.toastController.create({
      message: 'Debe completar todos los campos para continuar.',
      duration: 3000
    });
    toast.present();
  }
  async toast_datosInvalidos() {
    const toast = await this.toastController.create({
      message: 'Datos inválidos. Por favor, revise sus datos.', 
      duration: 5000
    });
    toast.present();
  }
  async toast_success() {
    const toast = await this.toastController.create({
      message: 'Compra generada satisfactoriamente.', 
      duration: 3000
    });
    toast.present();
  }
  async toast_insufficient() {
    const toast = await this.toastController.create({
      message: 'El saldo es insuficiente.', 
      duration: 5000
    });
    toast.present();
  }
  async toast_invalid() {
    const toast = await this.toastController.create({
      message: 'El número de transacción no es válido.', 
      duration: 5000
    });
    toast.present();
  }
  async toast_error() {
    const toast = await this.toastController.create({
      message: 'Algo salió mal. Intente nuevamente.', 
      duration: 5000
    });
    toast.present();
  }  
}
