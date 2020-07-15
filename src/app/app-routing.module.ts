import { ProfileComponent } from './main/profile/profile.component';
import { ReportsComponent } from './main/reports/reports.component';
import { VolumesComponent } from './main/volumes/volumes.component';
import { CreateAdminComponent } from './main/create-admin/create-admin.component';
import { DashboardComponent } from './main/dashboard/dashboard.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './main/login/login.component';
import { AddVolumeComponent } from './main/add-volume/add-volume.component';
import { AddReportComponent } from './main/add-report/add-report.component';

const routes: Routes = [
  { path: '', redirectTo: 'dashboard', pathMatch: 'full' },
  { path: 'dashboard', component: DashboardComponent },
  { path: 'create-admin', component: CreateAdminComponent },
  { path: 'volumes', component: VolumesComponent },
  { path: 'reports', component: ReportsComponent },
  { path: 'login', component: LoginComponent },
  { path: 'add-volume', component: AddVolumeComponent },
  { path: 'add-report', component: AddReportComponent },
  { path: 'profile', component: ProfileComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
