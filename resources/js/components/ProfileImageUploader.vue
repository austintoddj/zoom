<script type="text/ecmascript-6">

    /**
     * Upload a profile picture.
     *
     * @author Mohamed Said <themsaid@gmail.com>
     */
    export default {
        props: ['user', 'url'],

        data() {
            return {
                imageUrl: '',
                uploading: false,
            }
        },

        mounted() {
            this.imageUrl = this.url;
        },

        methods: {
            // Save the image
            saveImage() {
                this.$emit('changed', {url: this.imageUrl});

                this.close();
            },

            // Close the modal
            close() {
                this.modalShown = false;
            },

            // Update the selected image
            updateImage({url, caption}) {
                this.imageUrl = url;

                this.uploading = false;
            },
        }
    }
</script>

<template>
    <div>
        <div v-if="imageUrl" id="current-image">
            <img :src="imageUrl" class="w-100 mb-2">
        </div>

        <input hidden type="hidden" name="profile_image" v-model="imageUrl">

        <image-picker
                @changed="updateImage"
                @uploading="uploading = true">
        </image-picker>
    </div>
</template>
