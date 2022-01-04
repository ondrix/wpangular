import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MbImageAdvancedComponent } from './mb-image-advanced.component';

describe('MbImageAdvancedComponent', () => {
  let component: MbImageAdvancedComponent;
  let fixture: ComponentFixture<MbImageAdvancedComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MbImageAdvancedComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(MbImageAdvancedComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
