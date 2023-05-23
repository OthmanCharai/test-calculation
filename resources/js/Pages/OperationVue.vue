<template lang="">
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md mx-auto bg-white p-8 shadow-md">
            <h3 v-if="form.result">Result : {{ form.result }}</h3>
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="firstNumber" value="First Number" />

                    <TextInput
                        id="firstNumber"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="form.firstNumber"
                        required
                        autofocus
                        autocomplete="firstNumber"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.firstNumber"
                    />
                </div>

                <div class="block mt-4">
                    <operator-input id="operatorInput" v-model="form.operator">
                    </operator-input>
                </div>

                <div class="mt-4">
                    <InputLabel for="secondNumber" value="secondNumber" />

                    <TextInput
                        id="secondNumber"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="form.secondNumber"
                        required
                        autocomplete="secondNumber"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.secondNumber"
                    />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton
                        class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Calculate
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>
<script setup>
import { reactive,ref } from "vue";
import axios from "axios";

import OperatorInput from "../components/OperatorComponent.vue";
import InputError from "../components/InputError.vue";
import InputLabel from "../components/InputLabel.vue";
import PrimaryButton from "../components/PrimaryButton.vue";
import TextInput from "../components/TextInput.vue";

const form = reactive({
    firstNumber: "",
    secondNumber: "",
    operator: "",
    processing: false,
    errors: {
        firstNumber: ref(""),
        secondNumber: ref(''),
    },
    result: "",
});

const submit = async () => {
  form.errors.secondNumber = "";
  if (form.operator === "division" && form.secondNumber == 0) {
    form.errors.secondNumber = "division by 0";
    return;
  }
  form.processing = true;
  
  try {
    const response = await axios.post(
      `http://127.0.0.1:8000/api/operation/${form.operator}`,
      {
        firstNumber: form.firstNumber,
        secondNumber: form.secondNumber,
      }
    );
    form.result = response.data.data.result;
  } catch (error) {
    form.errors = error.response.data.errors;
  } finally {
    form.processing = false;
  }
};
</script>
<style lang=""></style>
