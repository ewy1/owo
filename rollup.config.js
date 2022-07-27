import commonjs from '@rollup/plugin-commonjs';
import nodeResolve from "@rollup/plugin-node-resolve";

export default {
  input: 'owo.js',
  output: {
    file: 'owo.bundle.js',
    format: 'cjs'
  },
  plugins: [commonjs(), nodeResolve()]
};
