import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { DashboardComponent } from './main/dashboard/dashboard.component';
import { LoginComponent } from './main/login/login.component';
import { CreateAdminComponent } from './main/create-admin/create-admin.component';
import { VolumesComponent } from './main/volumes/volumes.component';
import { ReportsComponent } from './main/reports/reports.component';
import { TopnavComponent } from './sub-components/topnav/topnav.component';
import { SidenavComponent } from './sub-components/sidenav/sidenav.component';
import { ProfileComponent } from './main/profile/profile.component';
import { AddVolumeComponent } from './main/add-volume/add-volume.component';
import { AddReportComponent } from './main/add-report/add-report.component';

@NgModule({
  declarations: [
    AppComponent,
    DashboardComponent,
    LoginComponent,
    CreateAdminComponent,
    VolumesComponent,
    ReportsComponent,
    TopnavComponent,
    SidenavComponent,
    ProfileComponent,
    AddVolumeComponent,
    AddReportComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
