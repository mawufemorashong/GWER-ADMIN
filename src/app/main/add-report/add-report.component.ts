import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-add-report',
  templateUrl: './add-report.component.html',
  styleUrls: ['./add-report.component.scss'],
})
export class AddReportComponent implements OnInit {
  constructor() {}

  ngOnInit(): void {
    this.loadScript();
  }

  public loadScript(): void {
    const body = document.body as HTMLDivElement;
    const script = document.createElement('script');
    script.innerHTML = '';
    script.src = '../../../assets/js/custom.js';
    script.async = true;
    script.defer = true;
    body.appendChild(script);
  }
}
