package po;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class FxgamesBuscadorPage {
	//Declarar las variables para luego inicializar los objetos
	private WebDriver driver;
	private WebDriverWait wait;
	
	/**
	 * Declarar constructor para que reciban el driver y wait de la clase Test
	 * @param driver
	 * @param wait
	 */
	public FxgamesBuscadorPage (WebDriver driver, WebDriverWait wait) {
		this.driver = driver;
		this.wait = wait;
	}
	
	/**
	 * Búsqueda de elementos de la página, WebElements sin valor todavía
	 */
	private By byTituloBuscado = By.xpath("/html/body/div[4]/div/div/div[1]/div[2]/div/div[1]/h3");
	private WebElement tituloBuscado;
	
	/**
	 * Métodos para interactuar con los elementos de la página arriba expuestos
	 */
	public String leerTituloProductoBuscado() {
		tituloBuscado = driver.findElement(byTituloBuscado);
		wait.until(ExpectedConditions.visibilityOf(tituloBuscado));
		return tituloBuscado.getText();
	}
}
