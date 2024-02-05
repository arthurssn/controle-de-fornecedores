import axios from "axios";

const ENDPOINT: string = '/api/suppliers';

const SupplierService = {
    async getAll(url = '', params: IQueryParams = {} as IQueryParams) {
        return await axios.get(url ?? ENDPOINT, { params });
    },
    async get(id: number) {
        return await axios.get(`${ENDPOINT}/${id}`);
    },
    async create(data: ISupplier) {
        return await axios.post(ENDPOINT, data);
    },
    async update(id: number, data:ISupplier) {
        return await axios.put(`${ENDPOINT}/${id}`, data);
    },
    async delete(id: number) {
        return await axios.delete(`${ENDPOINT}/${id}`);
    }
}

export default SupplierService;
