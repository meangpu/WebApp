using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ExampleScript2 : MonoBehaviour
{
    private int enemyDistance = 0;
    static private int enemyCount = 3;
    private string[] enemies = new string[enemyCount];
    private int weaponId = 0;

    void Update()
    {
        if (Input.GetKeyDown(KeyCode.Space)){
            // EnemySearch();
            // EnemyDestruction();
            // EnemyScan();
            // EnemyRoaster();
            WeaponSearch();
        }
    }

     void EnemyDestruction()
     {
        while (enemyCount > 0)
        {
            print("There is an enemy! Let's destroy it!");
            enemyCount--;
        } 
     }


    void EnemySearch(){
        for (int i=0; i<5; i++){
            enemyDistance = Random.Range(1, 10);
            if (enemyDistance >= 8){
                print("An enemy is far away!");
            }
            else if (enemyDistance >= 4 && enemyDistance <= 7){
                print("An enemy is at medium range!");
            }
            else if (enemyDistance < 4){
                print("An enemy is very close by!");
            }

        }
    }
    void EnemyScan()
    {
        bool isAlive = false;
        do{
            print("Scaning for enemies!");
        }
        while (isAlive == true);
    }

    void EnemyRoaster()
    {
        enemies[0] = "Orc";
        enemies[1] = "Dragon";
        enemies[2] = "Snake";

        foreach (string enemy in enemies){
            print(enemy);
        }
    }

    void WeaponSearch()
    {
        weaponId = Random.Range(0, 8);
        switch (weaponId)
        {
            case 1:
                print("You found a sword!");
                break;
            case 2:
                print("You found a axe!");
                break;
            case 3:
                print("You found a dagger!");
                break;     
            case 4:
                print("You found a bow!");
                break;    
            default:
                print("You didn't find anything!");
                break;          
        }
    }


}
