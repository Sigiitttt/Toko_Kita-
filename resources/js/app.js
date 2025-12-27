import './bootstrap';

import Alpine from 'alpinejs';
import mask from '@alpinejs/mask'; // 1. Import Mask

Alpine.plugin(mask); // 2. Pasang Plugin

window.Alpine = Alpine;

Alpine.start();