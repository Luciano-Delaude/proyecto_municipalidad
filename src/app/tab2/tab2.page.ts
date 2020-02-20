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
  tarea: tarea = {funcion: '', dni: ''};
  empleado: empleado = {dni:"", nTarjeta:"", pinTarjeta:"", nombre:"", saldo:0, muni:0};
  constructor(
    private http: HttpClient,
    public toastController: ToastController
  ) {}

  getTransacciones(){
    if(this.tarea.dni == 'klfjsdlk') console.log('aviso');
    else{
      this.tarea.funcion = 'getTran';
      var formData = new FormData();
      for (var key in this.tarea){
        formData.append(key, this.tarea[key]);
      }
      this.http.post('http://54.203.96.189/controladores/funciones.controlador.php',formData)
      .subscribe((res: any) => {
        if(res.users[0] == null) console.log('no existe')
        else{
          this.empleado = res.users[0];
          console.log(res.users[0]);
        }
      });
    }
  }
}
