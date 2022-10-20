<template>
    <section>
        <slot></slot>
    </section>
</template>

<script>
export default {

}
</script>

<style>
.modal-mask {
  position: absolute;
  z-index: 10;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: right;

}
</style>