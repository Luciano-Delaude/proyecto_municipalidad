import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { tarea } from '../tarea'
import { empleado } from '../empleado'
import { ToastController } from '@ionic/angular';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss'],
})

export class Tab1Page {
  tarea: tarea = {funcion: '', dni: ''};
  empleado: empleado = {dni:"", nTarjeta:"", pinTarjeta:"", nombre:"", saldo:0, muni:0};
  showList: boolean = false;
  constructor(
    private http: HttpClient,
    public toastController: ToastController
  ) {}
//65489256
  consultarSaldo(){
    if(this.tarea.dni == '') this.toast_dniVacio();
    else{
      this.tarea.funcion = 'getSaldo';
      var formData = new FormData();
      for (var key in this.tarea){
        formData.append(key, this.tarea[key]);
      }
      console.log('getSaldo');
      this.http.post('http://54.203.96.189/controladores/funciones.controlador.php',formData)
      .subscribe((res: any) => {
        if(res.users[0] == null) console.log('no existe')
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

  async toast_dniVacio() {
    const toast = await this.toastController.create({
      message: 'Debe ingresar un DNI',
      duration: 2000
    });
    toast.present();
  }
}
