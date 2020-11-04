import React, { useCallback } from "react";
import { useForm, Controller } from "react-hook-form";
import { toast } from "react-toastify";
import api from "../../../services/api";
import Wysiwyg from "../../../components/Wysiwyg";

const Editor = () => {
  const url = process.env.MIX_APP_URL;
  const { handleSubmit, control } = useForm({ mode: "onChange" });

  const onSubmit = useCallback(async ({ texto }) => {
    try {
      await api.post(`editors`, { texto });
      toast.success("Mensagem inserida");
      // window.location.href = `${url}/editor`;
    } catch (error) {
      toast.error(error);
    }
  }, []);

  return (
    <form method="POST" onSubmit={handleSubmit(onSubmit)}>
      <div className="form-group">
        <Controller as={<Wysiwyg />} name="texto" control={control} />
      </div>
      <div className="col-2">
        <button className="btn btn-primary" type="submit">
          <i className="fa fa-save"></i> Enviar
        </button>
      </div>
    </form>
  );
};

export default Editor;
