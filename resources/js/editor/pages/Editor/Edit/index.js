import React, { useCallback, useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { useForm, Controller } from "react-hook-form";
import { toast } from "react-toastify";
import api from "../../../../services/api";
import Wysiwyg from "../../../../components/Wysiwyg";

const EditorEdit = () => {
  const url = process.env.MIX_APP_URL;
  const { handleSubmit, control } = useForm({ mode: "onChange" });
  const [texto, setTexto] = useState("");
  const { id } = useParams();

  useEffect(() => {
    if (id > 0) {
      async function loadTexto() {
        const response = await api.get(`editors/${id}`);
        setTexto(response.data.data.texto);
      }
      loadTexto(id);
    }
  }, [id]);

  const onSubmit = useCallback(
    async ({ texto }) => {
      try {
        await api.put(`editors/${id}`, { texto });
        // window.location.href = `${url}/editor`;
      } catch (error) {
        toast.error(error);
      }
    },
    [id]
  );

  return (
    <form method="POST" onSubmit={handleSubmit(onSubmit)}>
      <div className="form-group">
        <Controller
          as={<Wysiwyg initial={texto} />}
          name="texto"
          control={control}
        />
      </div>
      <div className="col-2">
        <button className="btn btn-primary" type="submit">
          <i className="fa fa-save"></i> Enviar
        </button>
      </div>
    </form>
  );
};

export default EditorEdit;
