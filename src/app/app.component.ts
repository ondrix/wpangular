import { Component, OnInit, OnDestroy } from '@angular/core';
import { Router } from '@angular/router';

import { DynamicGlobalsService } from './shared/dynamic-globals.service';
import { ConstantGlobals } from './shared/constant-globals';

import { Subject } from 'rxjs';
import { takeUntil } from 'rxjs/operators';
import { RestApiService } from './shared/rest-api.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit, OnDestroy{

  private unsubscribeOnDestroy: Subject<void> = new Subject();
  
  title = 'app';

  constructor(
    public dynamicGlobals: DynamicGlobalsService,
    private router: Router,
    private restApi: RestApiService
  ) { }

  ngOnInit(){
    this.getSiteInfo();
    this.getMainMenu();
  }

  // Get Site Information (name and description)
  getSiteInfo(){

    // Check if this info is cached on LocalStorage
    if(localStorage.hasOwnProperty("siteInfo")){
      let cachedSiteInfo = JSON.parse(localStorage.getItem("siteInfo"));
      this.dynamicGlobals.siteName=cachedSiteInfo['name'];
      this.dynamicGlobals.siteDescription=cachedSiteInfo['description'];
    }else{ // Retrieve it from backend and cache it for next time
      
      this.restApi.getSiteInfo().pipe(takeUntil(this.unsubscribeOnDestroy)).subscribe((httpResponse)=>{
        // Save this basic information into localStorage for later use
        localStorage.setItem("siteInfo",JSON.stringify(httpResponse.body));
        this.dynamicGlobals.siteName=httpResponse.body['name'];
        this.dynamicGlobals.siteDescription=httpResponse.body['description'];
      });
    }

  }

  // Get Main Menu
  getMainMenu(){

    // Check if the Menu is cached on LocalStorage
    if(localStorage.hasOwnProperty("mainMenu")){
      let cachedMenu = JSON.parse(localStorage.getItem("mainMenu"));
      this.dynamicGlobals.mainMenu = this.reMapMenu(cachedMenu);
    }else{ // Retrieve it from backend and cache it for next time

    this.restApi.getMenuAtLocation('main_menu').pipe(takeUntil(this.unsubscribeOnDestroy)).subscribe(
      httpResponse=>{
        // Save menu into localStorage for later use
        localStorage.setItem("mainMenu",JSON.stringify(httpResponse.body['items']));
        this.dynamicGlobals.mainMenu=this.reMapMenu(httpResponse.body['items']);
      },
      error=>{
        console.log(error);  
      });
    
    }

  }

  // Re-Map Menu links to strip WP_ROOT_URL (http://...) from internal urls
  reMapMenu(menuItems){

    // Remove the WP_ROOT_URL from the internal urls
    menuItems.map((item) => {

      if(item.url.includes(ConstantGlobals.WP_ROOT_URL)){
        console.log(item.url + ' is an internal URL');
        item.url = item.url.replace(ConstantGlobals.WP_ROOT_URL+'/','');
      }else{
        console.log(item.url + ' is an external URL');
      }

      return item;

    });

    return menuItems;

  }
  

  ngOnDestroy() {
    // Unsubscribe from suscriptions
    this.unsubscribeOnDestroy.next();
    this.unsubscribeOnDestroy.complete();
  }

}
