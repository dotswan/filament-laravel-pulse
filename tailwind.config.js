const preset = require('./vendor/filament/filament/tailwind.config.preset')
import container from '@tailwindcss/container-queries'

module.exports = {
    presets: [preset],
    content: [
        './vendor/laravel/pulse/resources/views/**/*.blade.php',
    ],
    plugins: [container],
}
