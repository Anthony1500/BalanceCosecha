// vite.config.js
import { defineConfig } from "file:///H:/laragon/www/BalanceCosecha/node_modules/vite/dist/node/index.js";
import laravel from "file:///H:/laragon/www/BalanceCosecha/node_modules/laravel-vite-plugin/dist/index.js";
var vite_config_default = defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/index.css",
        "resources/css/style_login.css",
        "resources/css/style_mountains.css",
        "resources/css/style_sky.css",
        "resources/sass/inicio.scss",
        "resources/js/script.js",
        "resources/js/script_login.js",
        "resources/js/script_mountains.js"
      ],
      refresh: true
    })
  ]
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJIOlxcXFxsYXJhZ29uXFxcXHd3d1xcXFxCYWxhbmNlQ29zZWNoYVwiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiSDpcXFxcbGFyYWdvblxcXFx3d3dcXFxcQmFsYW5jZUNvc2VjaGFcXFxcdml0ZS5jb25maWcuanNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL0g6L2xhcmFnb24vd3d3L0JhbGFuY2VDb3NlY2hhL3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSc7XG5pbXBvcnQgbGFyYXZlbCBmcm9tICdsYXJhdmVsLXZpdGUtcGx1Z2luJztcblxuZXhwb3J0IGRlZmF1bHQgZGVmaW5lQ29uZmlnKHtcbiAgICBwbHVnaW5zOiBbXG4gICAgICAgIGxhcmF2ZWwoe1xuICAgICAgICAgICAgaW5wdXQ6IFtcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2Nzcy9pbmRleC5jc3MnLFxuICAgICAgICAgICAgICAgICdyZXNvdXJjZXMvY3NzL3N0eWxlX2xvZ2luLmNzcycsXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9jc3Mvc3R5bGVfbW91bnRhaW5zLmNzcycsXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9jc3Mvc3R5bGVfc2t5LmNzcycsXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9zYXNzL2luaWNpby5zY3NzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2pzL3NjcmlwdC5qcycsXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9qcy9zY3JpcHRfbG9naW4uanMnLFxuICAgICAgICAgICAgICAgICdyZXNvdXJjZXMvanMvc2NyaXB0X21vdW50YWlucy5qcycsXG4gICAgICAgICAgICBdLFxuICAgICAgICAgICAgcmVmcmVzaDogdHJ1ZSxcbiAgICAgICAgfSksXG4gICAgXSxcbn0pO1xuXG4iXSwKICAibWFwcGluZ3MiOiAiO0FBQWlSLFNBQVMsb0JBQW9CO0FBQzlTLE9BQU8sYUFBYTtBQUVwQixJQUFPLHNCQUFRLGFBQWE7QUFBQSxFQUN4QixTQUFTO0FBQUEsSUFDTCxRQUFRO0FBQUEsTUFDSixPQUFPO0FBQUEsUUFDSDtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxNQUNKO0FBQUEsTUFDQSxTQUFTO0FBQUEsSUFDYixDQUFDO0FBQUEsRUFDTDtBQUNKLENBQUM7IiwKICAibmFtZXMiOiBbXQp9Cg==
