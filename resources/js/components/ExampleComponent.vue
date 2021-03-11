<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        I'm an example component.
                        <button-component></button-component>
                        <simple-table></simple-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ButtonComponent from './ButtonComponent.vue';
    export default {
  components: { ButtonComponent },
        methods: {
            clicked() {
                console.log("clicked");
            }
        }
    }
</script>
