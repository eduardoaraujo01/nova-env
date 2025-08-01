<template>
    <card class="flex bg-90 flex-col items-center justify-center">
        <div class="px-3 py-3">
            <h1 class="text-center text-2xl text-80 font-light">
                <button
                    class="shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900"
                    @click.prevent="handleButton">
                    {{ this.__('Editar arquivo de ambiente') }}
                </button>
            </h1>
        </div>

        <Modal :show="isModalOpen">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden" style="width: 800px;">
                <div class="p-8">
                    <heading :level="2" class="mb-6">{{ this.__('Editar arquivo de ambiente') }}</heading>
                    <textarea class="w-full h-full form-control form-input form-input-bordered py-3 min-h-textarea"
                              cols="30" rows="20" v-model="value"></textarea>
                </div>

                <div class="bg-30 px-6 py-3 flex">
                    <div class="ml-auto">
                        <button type="button" data-testid="cancel-button" @click.prevent="handleCancel"
                                class="btn text-80 font-normal h-9 px-3 mr-3 btn-link">
                            {{ this.__('Cancel') }}
                        </button>
                        <button ref="confirmButton" data-testid="confirm-button" :disabled="isSaving"
                                @click.prevent="handleSave" class="btn btn-default btn-danger"
                                :class="{ 'cursor-not-allowed': isSaving, 'opacity-50': isSaving }">
                            <span v-if="isSaving">{{ this.__('Saving') }}</span>
                            <span v-else>{{ this.__('Save') }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </Modal>
    </card>
</template>

<script>
export default {
    props: ['card'],

    data() {
        return {
            value: '',
            isModalOpen: false,
            isSaving: false,
        }
    },

    methods: {
        handleButton() {
            this.isModalOpen = true

            Nova.request()
                .get(`/nova-vendor/nova-env-card/environment?env-name=${this.card.envName}`)
                .then(response => {
                    this.value = response.data;
                })
        },

        handleCancel() {
            this.isModalOpen = false
        },

        handleSave() {
            this.isSaving = true

            Nova.request()
                .post(`/nova-vendor/nova-env-card/environment?env-name=${this.card.envName}`, {
                    value: this.value
                })
                .then(response => {
                    this.isSaving = false
                    this.isModalOpen = false
                })
        },
    },
}
</script>

