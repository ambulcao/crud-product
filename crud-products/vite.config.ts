import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueTypeImports from 'vite-plugin-vue-type-imports'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    vueTypeImports(),
  ],
  server: {
    proxy: {
      "/api": {
        target: "http://127.0.0.1:8000",
        changeOrigin: true,
        headers: { 
          Accept : "application/json",
          "Content-Type" : "application/json",
        },
      },
    },
  },
  //css: {
  //  preprocessorOptions: {
  //    scss: {
  //      additionalData: `@import "@/style.css";`, 
  //    },
  //  },
  //},
});