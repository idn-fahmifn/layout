<script setup>
// Mengimpor komponen bawaan
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

// --- Data Dummy Penuh (Hardcoded di Frontend) ---
// Anggap ini adalah data yang seharusnya diterima dari TaskController@edit
const task = {
  id: 2,
  title: 'Mempelajari Alur Inertia.js',
  description: 'Fokus pada useForm dan Link untuk navigasi SPA. Target selesai hari Jumat.',
  dateline: '2025-11-15',
  priority: 'medium', // Data Priority default
  is_completed: false, // Data Status default
};
// ----------------------------------------------------

// Form untuk update tugas (UPDATE)
const form = useForm({
  // Isi form dengan data dummy yang diterima
  title: task.title,
  description: task.description,
  priority: task.priority,
  dateline: task.dateline,
  is_completed: task.is_completed,
});

const priorityOptions = [
  { value: 'low', label: 'Low' },
  { value: 'medium', label: 'Medium' },
  { value: 'high', label: 'High' },
];

const submitUpdate = () => {
  // Logic PUT/PATCH ke route tasks.update/ID
  alert(`Fungsi Update: Data akan dikirim ke tasks.update/${task.id}`);
  // Ganti ini dengan Inertia Form asli:
  // form.put(route('tasks.update', task.id));
};
</script>

<template>
  <AuthenticatedLayout title="Task">

    <Head :title="`Edit Task: ${task.title}`" />

    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Edit task: {{ task.title }}</h1>

        <Link :href="route('task.index')"
          class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
        ← close
        </Link>
      </div>

      <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">

        <form @submit.prevent="submitUpdate" class="space-y-6">

          <div>
            <InputLabel for="title" value="Task Name" />
            <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus />
            <InputError class="mt-2" :message="form.errors.title" />
          </div>

          <div>
            <InputLabel for="priority" value="Priority" />
            <select id="priority" v-model="form.priority" required
              class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm">
              <option v-for="option in priorityOptions" :key="option.value" :value="option.value">
                {{ option.label }}
              </option>
            </select>
            <InputError class="mt-2" :message="form.errors.priority" />
          </div>

          <div>
            <InputLabel for="dateline" value="Dateline" />
            <TextInput id="dateline" type="date" class="mt-1 block w-full" v-model="form.dateline" required autofocus />
            <InputError class="mt-2" :message="form.errors.title" />
          </div>

          <div>
            <InputLabel for="description" value="Description" />
            <textarea id="description"
              class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm"
              v-model="form.description" rows="4"></textarea>
            <InputError class="mt-2" :message="form.errors.description" />
          </div>

          <div class="flex items-center pt-4">
            <input type="checkbox" id="is_completed" v-model="form.is_completed"
              class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
            <label for="is_completed" class="ml-2 text-base text-gray-700 font-medium">
              Completed?
            </label>
            <InputError class="mt-2" :message="form.errors.is_completed" />
          </div>

          <div class="flex justify-end pt-4">
            <PrimaryButton :class="{ 'opacity-50': form.processing }" :disabled="form.processing || !form.title">
              Save Changes
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>