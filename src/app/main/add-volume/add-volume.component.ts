import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-add-volume',
  templateUrl: './add-volume.component.html',
  styleUrls: ['./add-volume.component.scss'],
})
export class AddVolumeComponent implements OnInit {
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
