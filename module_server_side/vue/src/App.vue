<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI';
  }

  .container {
    max-width: 85%;
    margin: auto;
  }
  .btn{
    padding: 12px 20px;
        border: none;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
        cursor: pointer;
        border-radius: 5px;
  }
</style>