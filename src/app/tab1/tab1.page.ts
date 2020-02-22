import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { tarea } from '../tarea'
import { proveedor } from '../proveedor'
import { ToastController } from '@ionic/angular';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss'],
})

export class Tab1Page {
  tarea: tarea = {funcion: '', nTarjeta: '', pinTarjeta: '', idProveedor: '', nTransaccion: '', monto: ''};
  proveedor: proveedor = {idProveedor:'', idMunicipalidad:'', nombre:'', direccion:'', categoria: 0};
  showSuccess: boolean = false;
  constructor(
    private http: HttpClient,
    public toastController: ToastController
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
      .subscribe((res: string) => {
        if(res == null) this.toast_datosInvalidos(); // checkear como viene la variable booleana
        else{
          this.showSuccess = (res == 'ok');
          setTimeout(()=>{
            this.showSuccess = false;
          }, 10000);
        }
      });
    }
  }

  async toast_campoVacio() {
    const toast = await this.toastController.create({
      message: 'Debe completar todos los campos para continuar.',
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
}
