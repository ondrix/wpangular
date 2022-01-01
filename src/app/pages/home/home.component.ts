import { Component, OnInit } from '@angular/core';
import { RestApiService } from 'src/app/shared/rest-api.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  constructor(private restApi: RestApiService) { }

  page;

  ngOnInit(): void {
    this.restApi.getPageBySlug("domov").subscribe((page) => { this.page = page });
  }

}
