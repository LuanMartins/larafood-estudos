export function formatCurrency(value){
    const passValue = Number(value);

    if(isNaN(passValue)){
        return 'Valor Inválido';
    }

    return passValue.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    });

}
