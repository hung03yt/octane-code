import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

require('./bootstrap');

import React from 'react';
import ReactDOM from 'react-dom';

// Your main React component
function App() {
    return (
        <div>
            <h1>Hello, React in Laravel Octane!</h1>
        </div>
    );
}

// Render the React component
if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
