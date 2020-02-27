import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ModalTransaccionProvPage } from './modal-transaccion-prov.page';

describe('ModalTransaccionProvPage', () => {
  let component: ModalTransaccionProvPage;
  let fixture: ComponentFixture<ModalTransaccionProvPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ModalTransaccionProvPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ModalTransaccionProvPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
