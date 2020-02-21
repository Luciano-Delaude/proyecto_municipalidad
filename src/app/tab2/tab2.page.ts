import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { tarea } from '../tarea'
import { empleado } from '../empleado'
import { ToastController } from '@ionic/angular';

@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {
  tarea: tarea = {funcion: '', nTarjeta: '', pinTarjeta: ''};
  empleado: empleado = {dni: '', nTarjeta: '', pinTarjeta: '', nombre: '', saldo:0, muni:0};
  transacciones: [];
  transaccion: {nTransaccion: '', nTarjeta: '', nombre: '', monto: '', fecha: ''};
  showList: boolean = false;
  constructor(
    private http: HttpClient,
    public toastController: ToastController
  ) {}

  getTransacciones(){
    if(this.tarea.nTarjeta == '' || this.tarea.pinTarjeta == '') this.toast_campoVacio();
    else{
      this.tarea.funcion = 'getTranEmpleado';
      var formData = new FormData();
      for (var key in this.tarea){
        formData.append(key, this.tarea[key]);
      }
      this.http.post('http://54.203.96.189/controladores/funciones.controlador.php',formData)
      .subscribe((res: any) => {
        if(res.users[0] == null) this.toast_datosInvalidos();
        else{
          this.transacciones = res.users[0];
          console.log(res.users[0]);
          this.showList = true;
          // setTimeout(()=>{
          //   this.showList = false;
          // }, 10000);
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
}
