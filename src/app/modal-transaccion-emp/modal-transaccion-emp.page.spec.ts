import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ModalTransaccionEmpPage } from './modal-transaccion-emp.page';

describe('ModalTransaccionEmpPage', () => {
  let component: ModalTransaccionEmpPage;
  let fixture: ComponentFixture<ModalTransaccionEmpPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ModalTransaccionEmpPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ModalTransaccionEmpPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
