import java.util.Scanner;
public class main{
    public static void main(String[]args){

    
    Scanner scanner = new Scanner(System.in);

    System.out.print("Enter First number: ");
    int num1 = scanner.nextInt();

    System.out.print("Enter second number: ");
    int num2 = scanner.nextInt();

    int sum = num1+num2;
    int average = sum/2;

    System.out.print("Sum is: " + sum + "Average: " + average);

  }
}