import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-mb-image-advanced',
  templateUrl: './mb-image-advanced.component.html',
  styleUrls: ['./mb-image-advanced.component.scss']
})
export class MbImageAdvancedComponent implements OnInit {

  @Input() image: any;
  constructor() { }

  ngOnInit(): void {
    // hej
    const a = "";
  }

}
