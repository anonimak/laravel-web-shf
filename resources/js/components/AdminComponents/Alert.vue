<template>
    <b-alert
        v-model="dismissCountDown"
        dismissible
        class="position-fixed fixed-bottom m-0 rounded-0"
        style="z-index: 2000;"
        fade
        :variant="variant"
        >
        {{ msg }}
    </b-alert>
</template>
<script>
export default {
    // props:["flash"],
    
    watch: {
        pageFlashes: {
          handler (flashes) {
            _.each(flashes, (flash, index) => {
                // set flash message here
              if(flash){
                  // disable edit when success
                  if (index == 'success') {
                      this.$emit('onSuccess')
                  }
                    this.dismissCountDown = 3
                    this.variant = index
                    this.msg = flash
              }
            })
            
          },
          deep: true
        }
    },
    data() {
        return {
            variant:null,
            dismissCountDown: null,
            msg:''
        }
    }
}
</script>