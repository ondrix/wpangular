import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { RestApiService } from 'src/app/shared/rest-api.service';

@Component({
  selector: 'app-person',
  templateUrl: './person.component.html',
  styleUrls: ['./person.component.scss']
})
export class PersonComponent implements OnInit {

  constructor(private restApi: RestApiService, private route: ActivatedRoute) { }
  
  person;

  ngOnInit(): void {
    const slug = this.route.snapshot.paramMap.get('slug');
    this.restApi.getPost(slug, 'persons')
      .subscribe(response => {
        this.person = response.pop();
      });
  }

}
