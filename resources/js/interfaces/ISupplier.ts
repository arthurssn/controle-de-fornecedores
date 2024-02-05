interface ISupplier {
    id?: number,
    "cpf_cnpj": string
    "name": string
    "email": string
    "phone": string
    "address": string
    "city": string
    "state": string
    "country": string,
    "number": string,
    "external"?: boolean
}

interface ISupplierResponse {
    current_page?: string,
    data: ISupplier[],
    links?: object[]
}


interface IQueryParams {
    orderBy: string,
    orderType: string,
    numberOfItemsPerPage: string | number,
    cnpj: string
}
