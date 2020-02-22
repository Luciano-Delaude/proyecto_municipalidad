import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { tarea } from '../tarea'
import { empleado } from '../empleado'
import { ToastController } from '@ionic/angular';
import { AlertController } from '@ionic/angular';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss'],
})

export class Tab1Page {
  tarea: tarea = {funcion: '', nTarjeta: '', pinTarjeta: ''};
  empleado: empleado = {dni:"", nTarjeta:"", pinTarjeta:"", nombre:"", saldo:0, muni:0};
  showList: boolean = false;
  constructor(
    private http: HttpClient,
    public toastController: ToastController,
    public alertController: AlertController,
  ) {}
//65489256 678
  consultarSaldo(){
    if(this.tarea.nTarjeta == '' || this.tarea.pinTarjeta == '') this.toast_campoVacio();
    else{
      this.tarea.funcion = 'getSaldo';
      var formData = new FormData();
      for (var key in this.tarea){
        formData.append(key, this.tarea[key]);
      }
      this.http.post('http://54.203.96.189/controladores/funciones.controlador.php',formData)
      .subscribe((res: any) => {
        if(res.users[0] == null) this.toast_datosInvalidos();
        else{
          this.empleado = res.users[0];
          console.log(res.users[0]);
          this.showList = true;
          setTimeout(()=>{
            this.showList = false;
          }, 10000);
        }
      });
    }
  }

  async toast_campoVacio() {
    const toast = await this.toastController.create({
      message: 'Debe completar ambos campos antes de enviar la consulta.',
      duration: 2000
    });
    toast.present();
  }
  async toast_datosInvalidos() {
    const toast = await this.toastController.create({
      message: 'Datos inválidos. Por favor, revise sus datos.', 
      duration: 2000
    });
    toast.present();
  }

  backButtonEvent() {
    document.addEventListener("backbutton", () => {        
      this.presentAlertConfirm();       
      // navigator['app'].exitApp(); // work for ionic 4      
    });
  }
  async presentAlertConfirm() {
    const alert = await this.alertController.create({
      // header: 'Confirm!',
      message: 'Are you sure you want to exit the app?',
      buttons: [
        {
          text: 'Cancel',
          role: 'cancel',
          cssClass: 'secondary',
          handler: (blah) => {
          }
        }, {
          text: 'Close App',
          handler: () => {
            navigator['app'].exitApp();
          }
        }
      ]
    });

    await alert.present();
  }
}
