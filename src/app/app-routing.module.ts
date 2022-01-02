// @angular modules
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './pages/home/home.component';
import { PersonListComponent } from './posts/person-list/person-list.component';
import { PersonComponent } from './posts/person/person.component';


// Routes with Lazy Load
const routes: Routes = [
  {
  path: '',
  pathMatch: 'full',
  component: HomeComponent
  },
  {
    path: 'zoznam-navstevnikov',
    pathMatch: 'full',
    component: PersonListComponent,
  },
  {
    path: "zoznam-navstevnikov/:slug",
    component: PersonComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
