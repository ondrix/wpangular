import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ConstantGlobals } from './constant-globals';
import { catchError, map } from 'rxjs/operators';
import { Observable } from 'rxjs';

@Injectable({
    providedIn: 'root'
})
export class RestApiService {

    constructor(
        private httpClient: HttpClient
    ) { }

    // PAGES
    getPages(): Observable<any>{
        return this.restGet('/wp/v2/pages');
    }

    getPageById(id): Observable<any>{
        return this.restGet('/wp/v2/pages/'+id);
    }

    getPageBySlug(slug): Observable<any>{
        return this.restGet('/wp/v2/pages?slug=' + slug)
            .pipe(map(pages => pages.pop()));
    }

    // POSTS
    getPosts(postType = "persons"): Observable<any>{
        return this.restGet('/wp/v2/' + postType);
    }

    getPost(slug: string, postType = "persons"): Observable<any>{
        return this.restGet('/wp/v2/' + postType + '/?slug=' + slug)
            .pipe(map(posts => posts.pop()));
    }

    // SITE

    // Get the site information from the generic wp-json endpoint
    getSiteInfo(){
        return this.httpClient.get(ConstantGlobals.WP_API_BASE, {observe: 'response'});
    }

    getMenuAtLocation(slug){
        return this.httpClient.get(ConstantGlobals.WP_API_BASE + '/wpangular/v1/menus/location/'+slug, {observe: 'response'});
    }

    private restGet(path: string): Observable<any> {
        return this.httpClient.get(this.restUrl(path))
    }
    
    private restUrl(path: string) : string {
        return ConstantGlobals.WP_API_BASE + path;
    }
}