import { Component, OnInit } from '@angular/core';
import { RestApiService } from 'src/app/shared/rest-api.service';

@Component({
  selector: 'app-person-list',
  templateUrl: './person-list.component.html',
  styleUrls: ['./person-list.component.scss']
})
export class PersonListComponent implements OnInit {

  constructor(private restApi: RestApiService) { }
  
  persons;

  ngOnInit(): void {
    this.restApi.getPosts("persons").subscribe(response => {
      this.persons = response;
    })
  }

}
