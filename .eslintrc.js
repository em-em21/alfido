// {
//   "env": {
//     "browser": true,
//     "es2021": true
//   },
//   "extends": ["airbnb", "prettier"],
//   "plugins": ["prettier"],
//   "parserOptions": {
//     "ecmaVersion": 12,
//     "sourceType": "module"
//   },
//   "rules": {
//     "no-unused-vars": "warn",
//     "no-console": "off",
//     "import/no-extraneous-dependencies": ["error", { "devDependencies": true }]
//   }
// }

module.exports = {
  root: true,
  env: {
    browser: true,
    amd: true,
    node: true,
  },
  parserOptions: {
    parser: 'babel-eslint',
    ecmaVersion: 2020,
    sourceType: 'module',
    ecmaFeatures: {
      jsx: true,
      modules: true,
      experimentalObjectRestSpread: true,
    },
  },
  extends: ['eslint:recommended', 'plugin:vue/recommended', 'prettier'],
  plugins: ['prettier'],
  rules: {
    'comma-dangle': 'off',
    'no-plusplus': 'off',
    'class-methods-use-this': 'off',
    'import/no-unresolved': 'off',
    'import/extensions': 'off',
    'implicit-arrow-linebreak': 'off',
    'import/prefer-default-export': 'off',
    'vue/component-name-in-template-casing': [
      'error',
      'kebab-case',
      {
        ignores: [],
      },
    ],
    'prettier/prettier': [
      'error',
      {
        singleQuote: true,
        endOfLine: 'auto',
      },
    ],
  },
};
