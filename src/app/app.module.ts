// @angular modules
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';

// Components
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

// Cache interceptor
import { environment } from '../environments/environment';
import { ServiceWorkerModule } from '@angular/service-worker';
import { APP_BASE_HREF } from '@angular/common';
import { HomeComponent } from './pages/home/home.component';
import { PersonListComponent } from './posts/person-list/person-list.component';
import { PersonComponent } from './posts/person/person.component';
import { MbImageAdvancedComponent } from './components/mb-image-advanced/mb-image-advanced.component';


@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    PersonListComponent,
    PersonComponent,
    MbImageAdvancedComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    ServiceWorkerModule.register('/ngsw-worker.js', {
      enabled: environment.production,
      // Register the ServiceWorker as soon as the app is stable
      // or after 30 seconds (whichever comes first).
      registrationStrategy: 'registerWhenStable:30000'
    }),
  ],
  providers: [
    { provide: APP_BASE_HREF, useValue: '/' }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
